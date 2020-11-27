<template>
    <!-- Section Modal -->
    <div class="modal fade" id="section-modal">
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
                <form @submit.prevent="editMode ? updateSection() : addSection()" @keydown="form.onKeydown($event)" autocomplete="off">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Section Name</label>
                            <input v-model="form.name"
                                type="text"
                                class="form-control"
                                v-bind:class="{ 'is-invalid': form.errors.has('name') }"
                                placeholder="e.g. Rose"
                            />
                            <has-error :form="form" field="name"></has-error>
                        </div>
                        <div class="form-group">
                            <label>Grade Level &amp; Track</label>
                            <select class="form-control" 
                                v-bind:class="{ 'is-invalid': form.errors.has('track_id') }" 
                                v-model="form.track_id">
                                <option value="">Select grade level...</option>
                                <option v-for="track in tracks.data" v-bind:value="track.id" v-bind:key="track.id">
                                    Grade {{ track.grade_level }} - {{ track.name }}
                                </option>
                            </select>
                            <has-error :form="form" field="track_id"></has-error>
                        </div>
                        <div class="form-group">
                            <label>Capacity</label>
                            <input v-model="form.capacity" 
                                v-bind:class="{ 'is-invalid': form.errors.has('capacity') }"
                                type="number" 
                                class="form-control"
                                placeholder="e.g. 45" 
                            />
                            <has-error :form="form" field="capacity"></has-error>
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
    name: 'SectionModal',

    props: {
        editMode: Boolean,
        sectionForm: Object,
        tracks: Object
    },
    
    data() {
        return {
            form: new Form()
        }
    },

    beforeMount() {
        this.form = this.sectionForm;
    },

    methods: {
        addSection() {
            this.$Progress.start();
            this.form.post('/registrar/api/sections').then(() => {
                this.$emit('reload-sections');
                $('#section-modal').modal('hide');
                Toast.fire({
                    icon: 'success',
                    title: 'Section added'
                });
                this.$Progress.finish();
                this.form.reset();
            }).catch(() => this.$Progress.fail());
        },

        updateSection() {
            this.$Progress.start();
            this.form.put(`/registrar/api/sections/${this.form.id}`).then(() => {
                this.$emit('reload-sections');
                $('#section-modal').modal('hide');
                Toast.fire({
                    icon: 'success',
                    title: 'Section updated'
                });
                this.$Progress.finish();
                this.form.reset();
            }).catch(() => this.$Progress.fail());
        }
    }
}
</script>