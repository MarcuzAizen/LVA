<template>
    <div class="modal fade" id="subject-offering-modal-shs">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-gradient-purple">
                    <img
                        src="/images/app/apple-touch-icon.png"
                        alt="LVA Logo"
                        height="50"
                        width="50"
                    />&nbsp;&nbsp;
                    <h4 class="p-2">Set Subject Offering</h4>
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="onSubmit" @keydown="form.onKeydown($event)" autocomplete="off">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Track/Strand</label>
                            <select class="form-control" disabled>
                                <option :value="track.id" :selected="true">
                                    {{ form.name }} - {{ form.grade_level }}
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ajax">Subjects</label>
                            <multiselect
                                v-model="form.subjects"
                                :multiple="true"
                                :options="subjects"
                                :close-on-select="false"
                                :clear-on-select="true"
                                :hide-selected="true"
                                :preserve-search="true"
                                :searchable="true"
                                :loading="isLoading"
                                :internal-search="false"
                                :allow-empty="true"
                                placeholder="Type to search..."
                                label="code"
                                track-by="code"
                                @select="clear"
                                @search-change="searchSubjects"
                            />
                        </div>
                        <div class="form-group">
                            <label>
                                Semester
                                <small class="text-info">
                                    <em>(optional)</em>
                                </small>
                            </label>
                            <select
                                class="form-control"
                                v-bind:class="{ 'is-invalid': form.errors.has('sem_to_offer') }"
                                v-model="form.sem_to_offer"
                            >
                                <option :value="null">Select semester...</option>
                                <option value="1">1st Sem</option>
                                <option value="2">2nd Sem</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal -->
</template>

<script>
import _ from 'lodash';
import Multiselect from 'vue-multiselect';

export default {
    name: 'SubjectOfferingModalJHS',

    props: {
        track: Object
    },

    components: {
        Multiselect
    },

    data() {
        return {
            isLoading: false,
            form: new Form(),
            subjects: []
        };
    },

    beforeMount() {
        this.form = this.track;
    },

    mounted() {
        this.searchSubjects = _.debounce(this.searchSubjects, 300);
    },

    methods: {
        clear() {
            this.$nextTick(() => {
                this.subjects = [];
            });
        },

        searchSubjects(query) {
            this.isLoading = true;
            axios.get(`/principal/api/subjects/search?query=${query}`).then(response => {
                this.subjects = response.data.data;
                this.isLoading = false;
            });
        },

        onSubmit() {
            this.$Progress.start();
            this.form.post(`/principal/api/tracks/${this.form.id}/add-subject-offerings`).then(() => {
                this.$emit('reload-prospectuses');
                $('#subject-offering-modal-shs').modal('hide');
                Toast.fire({
                    icon: 'success',
                    title: 'Success'
                });
                this.$Progress.finish();
                this.form.reset();
                this.form.clear();
            }).catch(error => {
                this.$Progress.fail();
                console.log(error);
            });
        }
    }
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css" />