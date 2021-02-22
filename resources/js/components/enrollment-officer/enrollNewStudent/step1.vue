<template>
    <div id="step-1">
        <h4 class="text-primary">
            <i class="fas fa-book" />
            <b>Educational Information</b>
        </h4>
        <hr>
        <div class="row">
            <div class="col-6">
                <ValidationProvider name="LRN" rules="required|digits:12" v-slot="{ errors }">
                    <div class="form-group">
                        <label>
                            Learner's Reference Number
                            <sup>
                                <i class="fas fa-star-of-life text-danger" />
                            </sup>
                        </label>
                        <input 
                            type="text"
                            class="form-control"
                            :class="{ 'is-invalid' : errors[0] || lrnExists }"
                            pattern="\d*"
                            maxlength="12"
                            v-model="lrn"
                            @keyup="checkLrn"
                        />
                        <span class="text-danger">
                            {{ errors[0] }}
                        </span>
                        <span v-if="lrnExists" class="text-danger">
                            LRN already exists
                        </span>
                    </div>                    
                </ValidationProvider>
            </div>
            <div class="col-6">
                <ValidationProvider name="Last School Attended" rules="required|min:3|max:45" v-slot="{ errors }">
                    <div class="form-group">
                        <label>
                            Last School Attended
                            <sup>
                                <i class="fas fa-star-of-life text-danger" />
                            </sup>
                        </label>
                        <input 
                            type="text"
                            class="form-control"
                            :class="{ 'is-invalid' : errors[0] }"
                            maxlength="45"
                            v-model="previous_school"
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
import _ from 'lodash';

export default {
    name: 'Step1',

    computed: {
        lrnExists: {
            get() {
                return this.$store.state.student.lrnExists;
            },

            set(value) {
                this.$store.commit('student/setLrnExists', value)
            }
        },

        lrn: {
            get() {
                return this.$store.state.student.lrn;
            },

            set(value) {
                this.$store.commit('student/setLrn', value)
            }
        },

        previous_school: {
            get() {
                return this.$store.state.student.previous_school;
            },

            set(value) {
                this.$store.commit('student/setPreviousSchool', value)
            }
        }
    },

    mounted() {
        this.checkLrn = _.debounce(this.checkLrn, 300);
    },

    methods: {
        checkLrn() {
            if (this.lrn) {
                axios.post(`/enrollment-officer/api/students/check-lrn`, { lrn: this.lrn })
                    .then(response => this.lrnExists = response.data.exists);
            }
        }
    }
}
</script>
