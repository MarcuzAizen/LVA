<template>
    <!-- Track modal -->
    <div class="modal fade" id="track-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-gradient-warning">
                    <img src="/images/app/apple-touch-icon.png" alt="LVA Logo" height="50" width="50">&nbsp;&nbsp;
                    <h4 class="p-2" v-if="editMode">Edit Track/Strand</h4>
                    <h4 class="p-2" v-else>Add Track/Strand</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="editMode ? updateTrack() : addTrack()" @keydown="form.onKeydown($event)" autocomplete="off">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Track Name</label>
                            <input v-model="form.name"
                                type="text"
                                class="form-control"
                                v-bind:class="{ 'is-invalid': form.errors.has('name') }"
                                placeholder="e.g. JHS, STEM, GAS"
                            />
                            <has-error :form="form" field="name"></has-error>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input v-model="form.description"
                                type="text"
                                class="form-control"
                                v-bind:class="{ 'is-invalid': form.errors.has('description') }"
                                placeholder="e.g. Oral Communication in Context"
                            />
                            <has-error :form="form" field="description"></has-error>
                        </div>
                        <div class="form-group">
                            <label>Grade Level</label>
                            <select class="form-control" 
                                v-bind:class="{ 'is-invalid': form.errors.has('grade_level') }" 
                                v-model="form.grade_level">
                                <option value="">Select grade level</option>
                                <option value="7">Grade 7</option>
                                <option value="8">Grade 8</option>
                                <option value="9">Grade 9</option>
                                <option value="10">Grade 10</option>
                                <option value="11">Grade 11</option>
                                <option value="12">Grade 12</option>
                            </select>
                            <has-error :form="form" field="grade_level"></has-error>
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
    </div><!-- modal -->
</template>

<script>
export default {
    name: 'TrackModal',
    props: {
        editMode: Boolean,
        trackForm: Object
    },
    data() {
        return {
            form: new Form()
        }
    },
    beforeMount() {
        this.form = this.trackForm;
    },
    methods: {
        addTrack() {
            this.$Progress.start();
            this.form.post('/registrar/api/tracks').then(() => {
                this.$emit('reload-tracks');
                $('#track-modal').modal('hide');
                Toast.fire({
                    icon: 'success',
                    title: 'Track added'
                });
                this.$Progress.finish();
                this.form.reset();
            }).catch(() => this.$Progress.fail());
        },
        updateTrack() {
            this.$Progress.start();
            this.form.put(`/registrar/api/tracks/${this.form.id}`).then(() => {
                this.$emit('reload-tracks');
                $('#track-modal').modal('hide');
                Toast.fire({
                    icon: 'success',
                    title: 'Track updated'
                });
                this.$Progress.finish();
                this.form.reset();
            }).catch(() => this.$Progress.fail());
        },
    }
}
</script>