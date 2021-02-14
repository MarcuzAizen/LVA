<template>
    <div id="step-4">
        <h4 class="text-primary">
            <i class="fas fa-user-shield" />
            <b>Parents' Information (Father)</b>
        </h4>
        <hr>
        <h5><b>Father</b></h5>
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
                        placeholder="e.g. McCullough"
                        v-model="first_name"
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
                        placeholder="e.g. Darion"
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
                        name="suffix"
                        placeholder="e.g. Jr"
                        v-model="suffix"
                    />
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
        </div>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label>
                        Contact Number
                        <sup>
                            <i class="fas fa-star-of-life text-danger" />
                        </sup>
                    </label>
                    <input type="tel" 
                        class="form-control"
                        placeholder="e.g 09123456789"
                        maxlength="11"
                        v-model="contact_number"
                    />
                </div>
            </div>
            <div class="col-4">
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
            <div class="col-4">
                <div class="form-group">
                    <label>
                        Occupation
                        <sup>
                            <i class="fas fa-star-of-life text-danger" />
                        </sup>
                    </label>
                    <input
                        type="text"
                        class="form-control"
                        v-model="occupation"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Step4',

    computed: {
        first_name: {
            get() {
                return this.$store.state.guardianFather.first_name;
            },

            set(value) {
                this.$store.commit('guardianFather/setFirstName', value)
            }
        },

        last_name: {
            get() {
                return this.$store.state.guardianFather.last_name;
            },

            set(value) {
                this.$store.commit('guardianFather/setLastName', value)
            }
        },

        suffix: {
            get() {
                return this.$store.state.guardianFather.suffix;
            },

            set(value) {
                this.$store.commit('guardianFather/setSuffix', value)
            }
        },

        birthdate: {
            get() {
                return this.$store.state.guardianFather.birthdate;
            },

            set(value) {
                this.$store.commit('guardianFather/setBirthdate', value)
            }
        },

        contact_number: {
            get() {
                return this.$store.state.guardianFather.contact_number;
            },

            set(value) {
                this.$store.commit('guardianFather/setContactNumber', value)
            }
        },

        religion: {
            get() {
                return this.$store.state.guardianFather.religion;
            },

            set(value) {
                this.$store.commit('guardianFather/setReligion', value)
            }
        },

        occupation: {
            get() {
                return this.$store.state.guardianFather.occupation;
            },

            set(value) {
                this.$store.commit('guardianFather/setOccupation', value)
            }
        },
    }
}
</script>
