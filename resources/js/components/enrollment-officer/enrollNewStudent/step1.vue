<template>
    <div id="step-1">
        <h4 class="text-primary">
            <i class="fas fa-book" />
            <b>Educational Information</b>
        </h4>
        <hr>
        <div class="row">
            <div class="col-6">
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
                        pattern="\d*"
                        maxlength="12"
                        v-model="lrn"
                    />
                </div>
            </div>
            <div class="col-6">
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
                        v-model="previous_school"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Step1',

    computed: {
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
    }
}
</script>
