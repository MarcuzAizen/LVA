<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">
                            <i class="nav-icon fas fa-book-reader"></i> Track/Strand
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
                            <button type="button" class="btn btn-success" @click="showAddTrackModal">
                                <i class="fas fa-plus"></i> Add track/strand
                            </button>
                        </h3>
                        <div class="card-tools mt-1">
                            <div class="input-group" style="width: 200px;">
                                <input 
                                    type="text" 
                                    v-model="tracks_query"
                                    @keyup="searchTrack"
                                    class="form-control float-right"
                                    placeholder="Search"
                                    v-focus
                                />

                                <div class="input-group-append">
                                    <button type="button" class="btn btn-default" @click="searchTrack">
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
                                    <th scope="col">Track</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Grade Level</th>
                                    <th scope="col" class="text-center">Action</th>
                                </thead>
                                <tbody v-if="tracks.data != undefined && tracks.data.length >= 1">
                                    <tr v-for="track in tracks.data" v-bind:key="track.id">
                                        <th scope="row">{{ track.name }}</th>
                                        <td>{{ track.description }}</td>
                                        <td>{{ track.grade_level }}</td>
                                        <td class="text-center">
                                            <a role="button" style="cursor: pointer" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fas fa-edit text-info mr-2" @click="showEditTrackModal(track)"></i>
                                            </a>
                                            <a role="button" style="cursor: pointer" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="fas fa-trash text-danger mr-2" @click="deleteSubject(track.id)"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody v-else>
                                    <th colspan="4" class="text-center">{{ loadingText }}</th>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <pagination :data="tracks" @pagination-change-page="loadTracks" v-bind:limit="1" />
                    </div>
                </div><!-- /.card -->

                <TrackModal v-bind:trackForm="form" v-bind:editMode="editMode" v-on:reload-tracks="loadTracks" />
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</template>

<script>
import _ from 'lodash';
import TrackModal from '../../components/registrar/TrackModal';

export default {
    name: 'Track',
    components: {
        TrackModal
    },
    data() {
        return {
            loadingText: '',
            tracks: {},
            tracks_query: '',
            editMode: false,
            form: new Form({
                id: '',
                name: '',
                description: '',
                grade_level: '',
            }),
        }
    },
    mounted() {
        this.searchTrack = _.debounce(this.searchTrack, 300);
    },
    created() {
        this.loadingText = 'Loading...';
        this.$Progress.start();
        this.loadTracks();
        this.$on('reload-tracks', () => this.loadTracks());
    },
    methods: {
        showAddTrackModal() {
            this.editMode = false;
            this.form.reset();
            this.form.clear();
            $('#track-modal').modal('show');
        },
        showEditTrackModal(track) {
            this.editMode = true;
            this.form.reset();
            this.form.clear();
            this.form.fill(track);
            $('#track-modal').modal('show');
        },
        loadTracks(page = 1) {
            this.loadingText = 'Loading...';
            axios.get(`/registrar/api/tracks?page=${page}`).then(response => {
                this.tracks = response.data;
                this.loadingText = 'No data';
                this.$Progress.finish();
            }).catch(() => {
                this.$Progress.fail();
                this.loadingText = 'No data';
            });
        },
        searchTrack() {
            if (this.tracks_query) {
                axios.get(`/registrar/api/tracks/search?query=${this.tracks_query}`)
                    .then(response => this.tracks = response.data)
                    .catch();
            } else {
                this.loadTracks();
            }
        },
        deleteSubject(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    this.$Progress.start();
                    this.form.delete(`/registrar/api/tracks/${id}`).then(() => {
                        Swal.fire('Deleted!', 'Track is deleted.','success');
                        this.$emit('reload-tracks');
                        this.$Progress.finish();
                    }).catch(() => {
                        this.$Progress.fail();
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed',
                            text: 'Something went wrong!'
                        });
                    });
                }
            });
        }
    }
}
</script>