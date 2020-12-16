<template>
    <div class="card card-purple">
        <div class="card-header">
            <h3 class="card-title">{{ trackType }}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row" v-for="(chunk, index) in chunkedItems" :key="index">
                <div class="col-6" v-for="track in chunk" :key="track.id">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-sm" v-if="track.name != 'JHS'">
                            <thead>
                                <tr>
                                    <th colspan="3" id="grade-level">Grade {{ track.grade_level }} - {{ track.name }}</th>
                                    <th class="text-center">
                                        <a role="button" 
                                            style="cursor: pointer" 
                                            data-toggle="tooltip" 
                                            data-placement="top" 
                                            title="Add/Edit Subjects"
                                            @click="showSubjectOfferingModal(track)">
                                            <i class="fas fa-edit text-info"></i>
                                        </a>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Subject Code</th>
                                    <th>Description</th>
                                    <th>Unit(s)</th>
                                    <th>Semester</th>
                                </tr>
                            </thead>
                            <tbody v-if="track.subjects != undefined && track.subjects.length >= 1">
                                <tr v-for="subject in track.subjects" :key="subject.id">
                                    <td>{{ subject.code }}</td>
                                    <td>{{ subject.description }}</td>
                                    <td>{{ subject.unit }}</td>
                                    <td>{{ subject.pivot.sem_to_offer }}</td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <th colspan="4" class="text-center">No data</th>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- TODO: add modal component here -->
    </div>
</template>

<script>
import _ from 'lodash';
// TODO: add modal component

export default {
    name: 'SubjectOfferingCardSHS',

    props: {
        trackType: String,
        data: Array
    },

    /**
     * TODO: add components property here
     */

    data() {
        return {
            form: new Form({
                id: '',
                name: '',
                grade_level: '',
                subjects: [],
                semester: ''
            })
        }
    },

    computed: {
        chunkedItems() {
            return _.chunk(this.data, 2);
        }
    },

    methods: {
        showSubjectOfferingModal(track) {
            this.form.reset();
            this.form.clear();
            this.form.fill(track);
            if (track.subjects != undefined && track.subjects.length >= 1) {
                this.form.semester = track.subjects[0].pivot.sem_to_offer;
            } else {
                this.form.semester = null;
            }
            $('#subject-offering-modal-shs').modal('show');
        }
    }
}
</script>