<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">
                            <i class="nav-icon fas fa-door-open"></i> Section
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                    <!-- -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card card-outline card-warning">
                    <div class="card-header">
                        <h3 class="card-title">
                            <button type="button" class="btn btn-success" @click="showAddSectionModal">
                                <i class="fas fa-plus"></i> Add section
                            </button>
                        </h3>
                        <div class="card-tools mt-1">
                            <div class="input-group" style="width: 200px;">
                                <input 
                                    type="text" 
                                    class="form-control float-right"
                                    placeholder="Search"
                                    v-model="search_query"
                                    @keyup="searchSection"
                                    v-focus
                                />

                                <div class="input-group-append">
                                    <button type="button" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-head-fixed">
                                <thead>
                                    <th scope="col">Section Name</th>
                                    <th scope="col">Track/Strand</th>
                                    <th scope="col">Grade Level</th>
                                    <th scope="col">Capacity</th>
                                    <th scope="col" class="text-center">Action</th>
                                </thead>
                                <tbody v-if="sections.data != undefined && sections.data.length >= 1">
                                    <tr v-for="section in sections.data" :key="section.id">
                                        <th scope="row">{{ section.name }}</th>
                                        <td>{{ section.track.name }}</td>
                                        <td>{{ section.track.grade_level }}</td>
                                        <td>{{ section.capacity }}</td>
                                        <td>
                                            <a role="button" style="cursor: pointer" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fas fa-edit text-info mr-2" @click="showEditSectionModal(section)"></i>
                                            </a>
                                            <a role="button" style="cursor: pointer" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="fas fa-trash text-danger mr-2" @click="deleteSection(section.id)"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody v-else>
                                    <th colspan="5" class="text-center">No data</th>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <pagination :data="sections" @pagination-change-page="loadSections" :limit="1" />
                    </div>
                </div>
                <!-- /.card -->

                <SectionModal 
                    :editMode="editMode" 
                    :sectionForm="form"
                    :tracks="tracks"
                    v-on:reload-sections="loadSections"
                />
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</template>

<script>
import _ from 'lodash';
import SectionModal from '../../components/registrar/SectionModal';

export default {
    name: 'Section',

    components: {
        SectionModal
    },

    data() {
        return {
            editMode: false,
            search_query: '',
            tracks: {},
            sections: {},
            form: new Form({
                id: '',
                track_id: '',
                name: '',
                capacity: ''
            })
        }
    },

    created() {
        this.$Progress.start();
        this.loadSections();
        this.$on('reload-sections', () => this.loadSections());
    },

    mounted() {
        this.searchSection = _.debounce(this.searchSection, 300);
    },

    methods: {
        loadSections(page = 1) {
            axios.get(`/registrar/api/sections?page=${page}`).then(response => {
                this.sections = response.data;
                this.$Progress.finish();
            }).catch(() => {
                this.$Progress.fail();
            });
        },

        searchSection() {
            if (this.search_query) {
                axios.get(`/registrar/api/sections/search?query=${this.search_query}`).then(response => {
                    this.sections = response.data;
                });
            } else {
                this.loadSections();
            }
        },

        deleteSection(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(result => {
                if (result.value) {
                    this.$Progress.start();
                    axios.delete(`/registrar/api/sections/${id}`).then(() => {
                        Swal.fire('Deleted!', 'Section is deleted.', 'success');
                        this.$emit('reload-sections');
                        this.$Progress.finish();
                    }).catch(() => {
                        this.$Progress.fail();
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed',
                            text: 'Something went wrong!'
                        })
                    });
                }
            });
        },

        showAddSectionModal() {
            this.editMode = false;
            this.loadTracks();
             this.form.reset();
            this.form.clear();
            $('#section-modal').modal('show');
        },

        showEditSectionModal(section) {
            this.editMode = true;
            this.loadTracks();
            this.form.reset();
            this.form.clear();
            this.form.fill(section);
            $('#section-modal').modal('show');
        },

        loadTracks() {
            axios.get('/registrar/api/tracks/all').then(response => {
                this.tracks = response.data;
            });
        }
    }
}
</script>