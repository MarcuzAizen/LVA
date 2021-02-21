<template>
    <div id="step-2">
        <h4 class="text-primary">
            <i class="fas fa-user"></i>
            <b>Personal Information</b>
        </h4>
        <hr>
        <div class="row">
            <div class="col-3">
                <ValidationProvider name="first_name" rules="required|alpha_spaces" v-slot="{ errors }">
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
                            :class="{ 'is-invalid' : errors[0] }"
                            placeholder="e.g. John"
                            v-model="first_name"
                        />
                        <span class="text-danger">
                            {{ errors[0] }}
                        </span>
                    </div>
                </ValidationProvider>
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
                <ValidationProvider name="last_name" rules="required|alpha_spaces" v-slot="{ errors }">
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
                            :class="{ 'is-invalid' : errors[0] }"
                            placeholder="e.g. Dela Cruz"
                            v-model="last_name"
                        />
                        <span class="text-danger">
                            {{ errors[0] }}
                        </span>
                    </div>
                </ValidationProvider>
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
                <ValidationProvider name="gender" rules="required|alpha_spaces" v-slot="{ errors }">
                    <div class="form-group">
                        <label>
                            Gender
                            <sup>
                                <i class="fas fa-star-of-life text-danger" />
                            </sup>
                        </label>
                        <select 
                            class="form-control"
                            :class="{ 'is-invalid' : errors[0] }"
                            v-model="sex"
                        >
                            <option value=""></option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                        <span class="text-danger">
                            {{ errors[0] }}
                        </span>
                    </div>
                </ValidationProvider>
            </div>
            <div class="col-3">
                <ValidationProvider name="birthdate" rules="required" v-slot="{ errors }">
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
                            :class="{ 'is-invalid' : errors[0] }"
                            v-model="birthdate"
                        />
                        <span class="text-danger">
                            {{ errors[0] }}
                        </span>
                    </div>
                </ValidationProvider>
            </div>
            <div class="col-3">
                <ValidationProvider name="mother_tongue" rules="required" v-slot="{ errors }">
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
                            :class="{ 'is-invalid' : errors[0] }"
                            placeholder="e.g. Bisaya"
                            v-model="mother_tongue"
                        />
                        <span class="text-danger">
                            {{ errors[0] }}
                        </span>
                    </div>
                </ValidationProvider>
            </div>
            <div class="col-3">
                <ValidationProvider name="contact_number" rules="required|digits:11" v-slot="{ errors }">
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
                            :class="{ 'is-invalid' : errors[0] }"
                            maxlength="11"
                            placeholder="e.g. 09123456789"
                            v-model="contact_number"
                        />
                        <span class="text-danger">
                            {{ errors[0] }}
                        </span>
                    </div>
                </ValidationProvider>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <ValidationProvider name="ethnic" rules="required" v-slot="{ errors }">
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
                            :class="{ 'is-invalid' : errors[0] }"
                            placeholder="e.g. Higaonon"
                            v-model="ethnic"
                        />
                        <span class="text-danger">
                            {{ errors[0] }}
                        </span>
                    </div>
                </ValidationProvider>
            </div>
            <div class="col-6">
                <ValidationProvider name="religion" rules="required" v-slot="{ errors }">
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
                            :class="{ 'is-invalid' : errors[0] }"
                            placeholder="e.g. Seventh-day Adventist"
                            v-model="religion"
                        />
                        <span class="text-danger">
                            {{ errors[0] }}
                        </span>
                    </div>
                </ValidationProvider>
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
