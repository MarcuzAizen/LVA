<template>
    <!-- Teacher Form Modal -->
    <div class="modal fade" id="teacher-form-modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-gradient-purple">
                    <img src="/images/app/apple-touch-icon.png" alt="LVA Logo" height="50" width="50">&nbsp;&nbsp;
                    <h4 class="p-2" v-if="editMode">Edit Teacher</h4>
                    <h4 class="p-2" v-else>Add Teacher</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div><!-- /.modal-header -->

                <form @submit.prevent="editMode ? updateTeacher() : addTeacher()" @keydown="form.onKeydown($event)" autocomplete="off">
                    <div class="modal-body">
                        <!-- Biodata -->
                        <div class="row">
                            <h5>
                                <i class="fas fa-user-alt" />
                                <b>Biodata</b>
                            </h5>
                        </div><!-- /.row -->
                        <div class="row">
                            <!-- First Name -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>
                                        First Name
                                        <sup>
                                            <i class="fas fa-star-of-life text-danger" />
                                        </sup>
                                    </label>
                                    <input type="text"
                                        class="form-control"
                                        placeholder="e.g. John"
                                        v-model="form.first_name"
                                        v-bind:class="{ 'is-invalid': form.errors.has('first_name') }"
                                    />
                                    <has-error :form="form" field="first_name" />
                                </div>
                            </div>

                             <!-- Middle Name -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>
                                        Middle Name
                                        <small class="text-info">
                                            <em>(optional)</em>
                                        </small>
                                    </label>
                                    <input type="text"
                                        class="form-control"
                                        placeholder="e.g. Macapagal"
                                        v-model="form.middle_name"
                                        v-bind:class="{ 'is-invalid': form.errors.has('middle_name') }"
                                    />
                                    <has-error :form="form" field="middle_name" />
                                </div>
                            </div>

                            <!-- Last Name -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>
                                        Last Name
                                        <sup>
                                            <i class="fas fa-star-of-life text-danger" />
                                        </sup>
                                    </label>
                                    <input type="text"
                                        class="form-control"
                                        placeholder="e.g. Dela Cruz"
                                        v-model="form.last_name"
                                        v-bind:class="{ 'is-invalid': form.errors.has('last_name') }"
                                    />
                                    <has-error :form="form" field="last_name" />
                                </div>
                            </div>

                            <!-- Suffix -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>
                                        Suffix
                                        <small class="text-info">
                                            <em>(optional)</em>
                                        </small>
                                    </label>
                                    <input type="text"
                                        class="form-control"
                                        placeholder="e.g. Jr"
                                        v-model="form.suffix"
                                        v-bind:class="{ 'is-invalid': form.errors.has('suffix') }"
                                    />
                                    <has-error :form="form" field="suffix" />
                                </div>
                            </div>
                        </div><!-- /.row -->

                        <div class="row">
                            <!-- Gender -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>
                                        Gender
                                        <sup>
                                            <i class="fas fa-star-of-life text-danger" />
                                        </sup>
                                    </label>
                                    <select class="form-control"
                                        v-model="form.sex"
                                        v-bind:class="{ 'is-invalid': form.errors.has('sex') }">
                                        <option value="">Select gender...</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                    </select>
                                    <has-error :form="form" field="sex" />
                                </div>
                            </div>

                            <!-- Birthdate -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>
                                        Birthdate
                                        <sup>
                                            <i class="fas fa-star-of-life text-danger" />
                                        </sup>
                                    </label>
                                    <input type="date" 
                                        class="form-control"
                                        v-model="form.birthdate"
                                        v-bind:class="{ 'is-invalid': form.errors.has('birthdate') }"
                                    />
                                    <has-error :form="form" field="birthdate" />
                                </div>
                            </div>

                            <!-- Specialization -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>
                                        Specialization
                                        <sup>
                                            <i class="fas fa-star-of-life text-danger" />
                                        </sup>
                                    </label>
                                    <input type="text" 
                                        class="form-control"
                                        v-model="form.specialization"
                                        v-bind:class="{ 'is-invalid': form.errors.has('specialization') }"
                                        placeholder="e.g. Biology"
                                    />
                                    <has-error :form="form" field="specialization" />
                                </div>
                            </div>

                            <!-- Contact Number -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>
                                        Contact Number
                                        <sup>
                                            <i class="fas fa-star-of-life text-danger" />
                                        </sup>
                                    </label>
                                    <input type="tel"
                                        class="form-control"
                                        v-model="form.contact_number"
                                        v-bind:class="{ 'is-invalid': form.errors.has('contact_number') }"
                                        placeholder="e.g. 09123456789"
                                        pattern="[0-9]{4}[0-9]{3}[0-9]{4}"
                                        maxlength="11"
                                    />
                                    <has-error :form="form" field="contact_number" />
                                </div>
                            </div>
                        </div><!-- /.row -->
                        
                        <div class="row">
                            <!-- Citizenship -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        Citizenship
                                        <sup>
                                            <i class="fas fa-star-of-life text-danger" />
                                        </sup>
                                    </label>
                                    <input type="text"
                                        class="form-control"
                                        placeholder="e.g. Filipino"
                                        v-model="form.citizenship"
                                        v-bind:class="{ 'is-invalid': form.errors.has('citizenship') }"
                                    />
                                    <has-error :form="form" field="citizenship" />
                                </div>
                            </div>

                            <!-- Religion -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        Religion
                                        <sup>
                                            <i class="fas fa-star-of-life text-danger" />
                                        </sup>
                                    </label>
                                    <input type="text"
                                        class="form-control"
                                        placeholder="e.g. Seventh-day Adventist, Roman Catholic, etc."
                                        v-model="form.religion"
                                        v-bind:class="{ 'is-invalid': form.errors.has('religion') }"
                                    />
                                    <has-error :form="form" field="religion" />
                                </div>
                            </div>
                        </div><!-- /.row -->

                        <br>
                        
                        <!-- Address -->
                        <div class="row">
                            <h5>
                                <i class="fas fa-map-marked" />
                                <b>Address</b>
                            </h5>
                        </div><!-- /.row -->
                        <div class="row">
                            <!-- Purok/Street -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>
                                        Purok/Street
                                        <sup>
                                            <i class="fas fa-star-of-life text-danger" />
                                        </sup>
                                    </label>
                                    <input type="text"
                                        class="form-control"
                                        v-model="form.purok"
                                        v-bind:class="{ 'is-invalid': form.errors.has('purok') }"
                                        placeholder="e.g. Purok 1"
                                    />
                                    <has-error :form="form" field="purok" />
                                </div>
                            </div>

                            <!-- Barangay -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>
                                        Barangay
                                        <sup>
                                            <i class="fas fa-star-of-life text-danger" />
                                        </sup>
                                    </label>
                                    <input type="text"
                                        class="form-control"
                                        v-model="form.barangay"
                                        v-bind:class="{ 'is-invalid': form.errors.has('barangay') }"
                                        placeholder="e.g. Poblacion"
                                    />
                                    <has-error :form="form" field="barangay" />
                                </div>
                            </div>

                            <!-- City/Municipality -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>
                                        City/Municipality
                                        <sup>
                                            <i class="fas fa-star-of-life text-danger" />
                                        </sup>
                                    </label>
                                    <input type="text"
                                        class="form-control"
                                        v-model="form.city"
                                        v-bind:class="{ 'is-invalid': form.errors.has('city') }"
                                        placeholder="e.g. Don Carlos"
                                    />
                                    <has-error :form="form" field="city" />
                                </div>
                            </div>

                            <!-- Province -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>
                                        Province
                                        <sup>
                                            <i class="fas fa-star-of-life text-danger" />
                                        </sup>
                                    </label>
                                    <input type="text"
                                        class="form-control"
                                        v-model="form.province"
                                        v-bind:class="{ 'is-invalid': form.errors.has('province') }"
                                        placeholder="e.g. Bukidnon"
                                    />
                                    <has-error :form="form" field="province" />
                                </div>
                            </div>
                        </div><!-- /.row -->
                    </div><!-- /.modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" v-if="editMode">Save changes</button>
                        <button type="submit" class="btn btn-success" v-else>Submit</button>
                    </div><!-- /.modal-footer -->
                </form><!-- /.form -->
            </div><!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
    </div> <!-- /.modal -->
</template>

<script>
export default {
    name: 'TeacherFormModal',

    props: {
        teacherForm: Object,
        editMode: Boolean
    },

    data() {
        return {
            form: new Form()
        }
    },

    beforeMount() {
        this.form = this.teacherForm;
    },
    methods: {
        addTeacher() {
            this.$Progress.start();
            this.form.post('/principal/api/users').then(() => {
                this.$emit('reload-teachers');
                $('#teacher-form-modal').modal('hide');
                Toast.fire({
                    icon: 'success',
                    title: 'Teacher added'
                });
                this.$Progress.finish();
                this.form.reset();
                this.form.clear();
            }).catch(() => this.$Progress.fail());
        },

        updateTeacher() {
            this.$Progress.start();
            this.form.put(`/principal/api/users/${this.form.id}`).then(() => {
                this.$emit('reload-teachers');
                $('#teacher-form-modal').modal('hide');
                Toast.fire({
                    icon: 'success',
                    title: 'Teacher updated'
                });
                this.$Progress.finish();
                this.form.reset();
                this.form.clear();
            }).catch(() => this.$Progress.fail());
        }
    }
}
</script>

<style>

</style>