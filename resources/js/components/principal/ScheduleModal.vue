<template>
    <div :id="`schedule-modal-${section.name}`" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-gradient-purple">
                    <img
                        src="/images/app/apple-touch-icon.png"
                        alt="LVA Logo"
                        height="50"
                        width="50"
                    />&nbsp;&nbsp;
                    <h4 class="p-2" v-if="editMode">Edit schedule</h4>
                    <h4 class="p-2" v-else>Set schedule for {{ section.name }}</h4>
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- /.modal-header -->
                
                <form @submit.prevent="addSchedule" @keydown="form.onKeydown($event)" autocomplete="off">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Time Start</label>
                                    <input type="time" 
                                        class="form-control" 
                                        v-model="form.time_start"
                                        :class="{ 'is-invalid': form.errors.has('time_start') }" />
                                    <has-error :form="form" field="time_start" />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Time End</label>
                                    <input type="time" 
                                        class="form-control" 
                                        v-model="form.time_end"
                                        :class="{ 'is-invalid': form.errors.has('time_end') }" />
                                    <has-error :form="form" field="time_end" />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Day</label>
                                    <select class="form-control" 
                                        v-model="form.day"
                                        :class="{ 'is-invalid': form.errors.has('day') }">
                                        <option value="">Select day</option>
                                        <option value="M">Monday</option>
                                        <option value="T">Tuesday</option>
                                        <option value="W">Wednesday</option>
                                        <option value="H">Thursday</option>
                                        <option value="F">Friday</option>
                                    </select>
                                    <has-error :form="form" field="day" />
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <select class="form-control"
                                        v-model="form.prospectus_id"
                                        :class="{ 'is-invalid': form.errors.has('prospectus_id') }">
                                        <option value="">Select subject</option>
                                        <option v-for="prospectus in prospectuses" :key="prospectus.id" :value="prospectus.id">
                                            {{ prospectus.subject.code }} - {{ prospectus.subject.description }}
                                        </option>
                                    </select>
                                    <has-error :form="form" field="prospectus_id" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>School Year</label>
                                    <select class="form-control" 
                                        v-model="form.acad_year_id"
                                        :class="{ 'is-invalid': form.errors.has('acad_year_id') }">
                                        <option value="">Select school year</option>
                                        <option v-for="acadYear in acadYears" :key="acadYear.id" :value="acadYear.id">
                                            {{ acadYear.start }} - {{ acadYear.end }}
                                        </option>
                                    </select>
                                    <has-error :form="form" field="acad_year_id" />
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Teacher</label>
                                    <select class="form-control"
                                        v-model="form.teacher_id"
                                        :class="{ 'is-invalid': form.errors.has('teacher_id') }">
                                        <option value="">Select teacher</option>
                                        <option v-for="teacher in teachers" :key="teacher.id" :value="teacher.id">
                                            {{ teacher.full_name }} - {{ teacher.specialization }}
                                        </option>
                                    </select>
                                    <has-error :form="form" field="teacher_id" />
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" v-if="editMode">Save changes</button>
                        <button type="submit" class="btn btn-success" v-else>Submit</button>
                    </div>
                    <!-- /.modal-footer -->
                </form>
                <!-- /.form -->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</template>

<script>
export default {
    name: 'ScheduleModal',

    props: {
        section: Object,
        editMode: Boolean,
        acadYears: Array,
        prospectuses: Array,
        teachers: Array,
    },

    data() {
        return {
            form: new Form({
                acad_year_id: '',
                teacher_id: '',
                section_id: this.section.id,
                prospectus_id: '',
                day: '',
                time_start: '',
                time_end: ''
            })
        }
    },

    methods: {
        addSchedule() {
            this.$Progress.start();
            this.form.post('/principal/api/schedules').then(() => {
                this.$emit('reload-schedules');
                $(`#schedule-modal-${this.section.name}`).modal('hide');
                Toast.fire({
                    icon: 'success',
                    title: 'Schedule added'
                });
                this.$Progress.finish();
                this.form.reset();
            }).catch(error => {
                console.log(error);
                this.$Progress.fail()
            });
        }
    }
}
</script>
