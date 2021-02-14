<template>
    <div class="progress mb-4" style="height: 30px">
        <div id="progress-bar" 
            class="progress-bar bg-success rounded progress-bar-striped progress-bar-animated" 
            role="progressbar" 
            :style="{
                width: `${width}%`
            }" 
            :aria-valuenow="width"
            aria-valuemin="0" 
            aria-valuemax="100">
            <b class="lead font-weight-bold text-light" id="progress-bar-text">
                Step - {{ step }}
            </b>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ProgressBar',

    props: {
        step: Number,
        width: Number,
    }
}
</script>
