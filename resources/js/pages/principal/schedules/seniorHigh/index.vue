<template>
    <div>
        <ul class="nav nav-tabs mb-2">
            <li class="nav-item">
                <router-link :to="{ name: 'principal.schedules.grade_11' }" class="nav-link">
                    Grade 11
                </router-link>
            </li>
            <li class="nav-item">
                <router-link :to="{ name: 'principal.schedules.grade_12' }" class="nav-link">
                    Grade 12
                </router-link>
            </li>
        </ul>
        <router-view />
    </div>
</template>

<script>
export default {
    name: 'SeniorHigh'
}
</script>
