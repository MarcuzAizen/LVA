<template>
    <!-- AcadYear Modal -->
    <div class="modal fade" id="acad-year-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-gradient-warning">
                    <img src="/images/app/apple-touch-icon.png" alt="LVA Logo" height="50" width="50">&nbsp;&nbsp;
                    <h4 class="p-2" v-if="editMode">Edit School Year</h4>
                    <h4 class="p-2" v-else>Add School Year</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="editMode ? updateAcadYear() : addAcadYear()" @keydown="form.onKeydown($event)" autocomplete="off">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Start year</label>
                            <date-picker v-model="form.start"
                                type="number"
                                :class="{ 'is-invalid': form.errors.has('start') }"
                                :config="options"
                                placeholder="e.g. 2020"
                            />
                            <has-error :form="form" field="start"></has-error>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" v-if="editMode">Save changes</button>
                        <button type="submit" class="btn btn-success" v-else>Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import datePicker from 'vue-bootstrap-datetimepicker';
import 'pc-bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.css';

export default {
    name: 'AcadYearModal',

    props: {
        editMode: Boolean,
        acadYearForm: Object
    },

    components: {
        datePicker
    },

    data() {
        return {
            form: new Form(),
            options: {
                format: 'YYYY'
            }
        }
    },

    beforeMount() {
        this.form = this.acadYearForm;
    },

    methods: {
        addAcadYear() {
            this.$Progress.start();
            this.form.post('/registrar/api/acad-years').then(() => {
                this.$emit('reload-acad-years');
                $('#acad-year-modal').modal('hide');
                Toast.fire({
                    icon: 'success',
                    title: 'School Year added'
                });
                this.$Progress.finish();
                this.form.reset();
            }).catch(() => this.$Progress.fail());
        },

        updateAcadYear() {
            this.$Progress.start();
            this.form.put(`/registrar/api/acad-years/${this.form.id}`).then(() => {
                this.$emit('reload-acad-years');
                $('#acad-year-modal').modal('hide');
                Toast.fire({
                    icon: 'success',
                    title: 'School Year added'
                });
                this.$Progress.finish();
                this.form.reset();
            }).catch(() => this.$Progress.fail());
        }
    }
}
</script>
