<template>
    <div id="step-3">
        <h4 class="text-primary">
            <i class="fas fa-map-marked"></i>
            <b>Address</b>
        </h4>
        <hr>
        <div class="row">
            <div class="col-3">
                <ValidationProvider name="purok" rules="required|min:3|max:45" v-slot="{ errors }">
                    <div class="form-group">
                        <label>
                            Purok
                            <sup>
                                <i class="fas fa-star-of-life text-danger" />
                            </sup>
                        </label>
                        <input
                            type="text"
                            class="form-control"
                            :class="{ 'is-invalid' : errors[0] }"
                            placeholder="e.g. Purok 1"
                            v-model="purok"
                        />
                        <span class="text-danger">
                            {{ errors[0] }}
                        </span>
                    </div>
                </ValidationProvider>
            </div>
            <div class="col-3">
                <ValidationProvider name="barangay" rules="required|min:3|max:45" v-slot="{ errors }">
                    <div class="form-group">
                        <label>
                            Barangay
                            <sup>
                                <i class="fas fa-star-of-life text-danger" />
                            </sup>
                        </label>
                        <input
                            type="text"
                            class="form-control"
                            :class="{ 'is-invalid' : errors[0] }"
                            placeholder="e.g. Poblacion"
                            v-model="barangay"
                        />
                        <span class="text-danger">
                            {{ errors[0] }}
                        </span>
                    </div>
                </ValidationProvider>
            </div>
            <div class="col-3">
                <ValidationProvider name="city/municipality" rules="required|min:3|max:45" v-slot="{ errors }">
                    <div class="form-group">
                        <label>
                            City/Municipality
                            <sup>
                                <i class="fas fa-star-of-life text-danger" />
                            </sup>
                        </label>
                        <input
                            type="text"
                            class="form-control"
                            :class="{ 'is-invalid' : errors[0] }"
                            placeholder="e.g. Don Carlos"
                            v-model="city"
                        />
                        <span class="text-danger">
                            {{ errors[0] }}
                        </span>
                    </div>
                </ValidationProvider>
            </div>
            <div class="col-3">
                <ValidationProvider name="province" rules="required|min:3|max:45" v-slot="{ errors }">
                    <div class="form-group">
                        <label>
                            Province
                            <sup>
                                <i class="fas fa-star-of-life text-danger" />
                            </sup>
                        </label>
                        <input
                            type="text"
                            class="form-control"
                            :class="{ 'is-invalid' : errors[0] }"
                            placeholder="e.g. Bukidnon"
                            v-model="province"
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
    name: 'Step3',

    computed: {
        purok: {
            get() {
                return this.$store.state.student.purok;
            },

            set(value) {
                this.$store.commit('student/setPurok', value)
            }
        },

        barangay: {
            get() {
                return this.$store.state.student.barangay;
            },

            set(value) {
                this.$store.commit('student/setBarangay', value)
            }
        },

        city: {
            get() {
                return this.$store.state.student.city;
            },

            set(value) {
                this.$store.commit('student/setCity', value)
            }
        },

        province: {
            get() {
                return this.$store.state.student.province;
            },

            set(value) {
                this.$store.commit('student/setProvince', value)
            }
        },
    }
}
</script>
