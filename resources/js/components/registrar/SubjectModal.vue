<template>
    <!-- Subject modal -->
    <div class="modal fade" id="subject-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-gradient-warning">
                    <img src="/images/app/apple-touch-icon.png" alt="LVA Logo" height="50" width="50">&nbsp;&nbsp;
                    <h4 class="p-2" v-if="editMode">Edit Subject</h4>
                    <h4 class="p-2" v-else>Add Subject</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="editMode ? updateSubject() : addSubject()" @keydown="form.onKeydown($event)" autocomplete="off">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Subject Code</label>
                            <input v-model="form.code"
                                type="text"
                                class="form-control"
                                :class="{ 'is-invalid': form.errors.has('code') }"
                                placeholder="e.g. Core 1"
                                name="code"
                                id="code"
                            />
                            <has-error :form="form" field="code"></has-error>
                        </div>
                        <div class="form-group">
                            <label>Subject Description</label>
                            <input v-model="form.description"
                                type="text"
                                class="form-control"
                                :class="{ 'is-invalid': form.errors.has('description') }"
                                placeholder="e.g. Oral Communication in Context"
                                name="description"
                                id="description"
                            />
                            <has-error :form="form" field="description"></has-error>
                        </div>
                        <div class="form-group">
                            <label>Subject Unit(s)</label>
                            <input v-model="form.unit"
                                type="number"
                                class="form-control"
                                :class="{ 'is-invalid': form.errors.has('unit') }"
                                placeholder="e.g. 1"
                                name="unit"
                                id="unit-add"
                            />
                            <has-error :form="form" field="unit"></has-error>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" v-if="editMode" class="btn btn-success">Save changes</button>
                        <button type="submit" v-else class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'SubjectModal',   
    props: {
        editMode: Boolean,
        subjectForm: Object
    },
    data() {
        return {
            form: new Form()
        }
    },
    beforeMount() {
        this.form = this.subjectForm;
    },
    methods: {
        addSubject() {
            this.$Progress.start();
            this.form.post('/registrar/api/subjects').then(() => {
                this.$emit('reload-subjects');
                $('#subject-modal').modal('hide');
                Toast.fire({
                    icon: 'success',
                    title: 'Subject added'
                });
                this.$Progress.finish();
                this.form.reset();
            }).catch(() => this.$Progress.fail());
        },
        updateSubject() {
            this.$Progress.start();
            this.form.put(`/registrar/api/subjects/${this.form.id}`).then(() => {
                this.$emit('reload-subjects');
                $('#subject-modal').modal('hide');
                Toast.fire({
                    icon: 'success',
                    title: 'Subject updated'
                });
                this.$Progress.finish();
                this.form.reset();
            }).catch(() => this.$Progress.fail());
        }
    } 
}
</script>