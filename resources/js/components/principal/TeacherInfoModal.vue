<template>
    <div class="modal fade" id="teacher-info-modal">
        <div class="modal-dialog modal-lg">
            <div class="card card-purple card-outline">
                <div class="card-body box-profile">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                            alt="User Profile"
                            src="/images/app/avatar5.png"
                            v-if="teacher.sex == 'M'"
                        />
                        <img class="profile-user-img img-fluid img-circle"
                            alt="User Profile"
                            src="/images/app/avatar3.png"
                            v-else
                        />
                        <h3 class="profile-username text-center">{{ teacher.full_name }}</h3>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b class="float-left">Gender</b>
                                <a class="float-right" v-if="teacher.sex == 'M'">Male</a>
                                <a class="float-right" v-else>Female</a>
                            </li>
                            <li class="list-group-item">
                                <b class="float-left">Birthdate</b>
                                <a class="float-right">{{ teacher.birthdate }}</a>
                            </li>
                            <li class="list-group-item">
                                <b class="float-left">Specialization</b>
                                <a class="float-right">{{ teacher.specialization }}</a>
                            </li>
                            <li class="list-group-item">
                                <b class="float-left">Contact Number</b>
                                <a class="float-right">{{ teacher.contact_number }}</a>
                            </li>
                            <li class="list-group-item">
                                <b class="float-left">Citizenship</b>
                                <a class="float-right">{{ teacher.citizenship }}</a>
                            <li class="list-group-item">
                                <b class="float-left">Religion</b>
                                <a class="float-right">{{ teacher.religion }}</a>
                            </li>
                            <li class="list-group-item">
                                <b class="float-left">Address</b>
                                <a class="float-right">{{ address(teacher) }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'TeacherInfoModal',

    props: {
        teacher: Object
    },

    methods: {
        address(teacher) {
            return teacher.purok + ', ' + teacher.barangay + ', ' + teacher.city + ', ' + teacher.province;
        }
    }
}
</script>
