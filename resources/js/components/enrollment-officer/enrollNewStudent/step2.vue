<template>
    <div id="step-2">
        <h4 class="text-primary">
            <i class="fas fa-user"></i>
            <b>Personal Information</b>
        </h4>
        <hr>
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label>
                        First Name
                        <sup>
                            <i class="fas fa-star-of-life text-danger" />
                        </sup>
                    </label>
                    <input
                        type="text" 
                        class="form-control"
                        placeholder="e.g. John"
                        v-model="first_name"
                    />
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>
                        Middle Name
                        <small class="text-info">
                            <em>(optional)</em>
                        </small>
                    </label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="e.g. Macapagal"
                        v-model="middle_name"
                    />
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>
                        Last Name
                        <sup>
                            <i class="fas fa-star-of-life text-danger" />
                        </sup>
                    </label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="e.g. Dela Cruz"
                        v-model="last_name"
                    />
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>
                        Suffix
                        <small class="text-info">
                            <em>(optional)</em>
                        </small>
                    </label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="e.g. Jr"
                        v-model="suffix"
                    />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label>
                        Gender
                        <sup>
                            <i class="fas fa-star-of-life text-danger" />
                        </sup>
                    </label>
                    <select class="form-control" v-model="sex">
                        <option value=""></option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>
                        Birthdate
                        <sup>
                            <i class="fas fa-star-of-life text-danger" />
                        </sup>
                    </label>
                    <input
                        type="date"
                        class="form-control"
                        v-model="birthdate"
                    />
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>
                        Mother Tongue
                        <sup>
                            <i class="fas fa-star-of-life text-danger" />
                        </sup>
                    </label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="e.g. Bisaya"
                        v-model="mother_tongue"
                    />
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>
                        Contact Number
                        <sup>
                            <i class="fas fa-star-of-life text-danger" />
                        </sup>
                    </label>
                    <input 
                        type="tel" 
                        class="form-control"
                        maxlength="11"
                        placeholder="e.g. 09123456789"
                        v-model="contact_number"
                    />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>
                        Ethnic
                        <sup>
                            <i class="fas fa-star-of-life text-danger" />
                        </sup>
                    </label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="e.g. Higaonon"
                        v-model="ethnic"
                    />
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>
                        Religion
                        <sup>
                            <i class="fas fa-star-of-life text-danger" />
                        </sup>
                    </label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="e.g. Seventh-day Adventist"
                        v-model="religion"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Step2',

    computed: {
        first_name: {
            get() {
                return this.$store.state.student.first_name;
            },

            set(value) {
                this.$store.commit('student/setFirstName', value)
            }
        },
        
        middle_name: {
            get() {
                return this.$store.state.student.middle_name;
            },

            set(value) {
                this.$store.commit('student/setMiddleName', value)
            }
        },
        
        last_name: {
            get() {
                return this.$store.state.student.last_name;
            },

            set(value) {
                this.$store.commit('student/setLastName', value)
            }
        },
        
        suffix: {
            get() {
                return this.$store.state.student.suffix;
            },

            set(value) {
                this.$store.commit('student/setSuffix', value)
            }
        },
        
        sex: {
            get() {
                return this.$store.state.student.sex;
            },

            set(value) {
                this.$store.commit('student/setSex', value)
            }
        },
        
        birthdate: {
            get() {
                return this.$store.state.student.birthdate;
            },

            set(value) {
                this.$store.commit('student/setBirthdate', value)
            }
        },
        
        mother_tongue: {
            get() {
                return this.$store.state.student.mother_tongue;
            },

            set(value) {
                this.$store.commit('student/setMotherTongue', value)
            }
        },
        
        contact_number: {
            get() {
                return this.$store.state.student.contact_number;
            },

            set(value) {
                this.$store.commit('student/setContactNumber', value)
            }
        },
        
        ethnic: {
            get() {
                return this.$store.state.student.ethnic;
            },

            set(value) {
                this.$store.commit('student/setEthnic', value)
            }
        },
        
        religion: {
            get() {
                return this.$store.state.student.religion;
            },

            set(value) {
                this.$store.commit('student/setReligion', value)
            }
        },
    }
}
</script>
