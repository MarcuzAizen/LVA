<template>
    <div>
        <ul class="nav nav-tabs mb-4">
            <li class="nav-item">
                <router-link :to="{ name: 'principal.schedules.grade_7' }" class="nav-link">
                    Grade 7
                </router-link>
            </li>
            <li class="nav-item">
                <router-link :to="{ name: 'principal.schedules.grade_8' }" class="nav-link">
                    Grade 8
                </router-link>
            </li>
            <li class="nav-item">
                <router-link :to="{ name: 'principal.schedules.grade_9' }" class="nav-link">
                    Grade 9
                </router-link>
            </li>
            <li class="nav-item">
                <router-link :to="{ name: 'principal.schedules.grade_10' }" class="nav-link">
                    Grade 10
                </router-link>
            </li>
        </ul>
        <router-view />
    </div>
</template>

<script>

export default {
    name: 'JuniorHigh',
}
</script>
