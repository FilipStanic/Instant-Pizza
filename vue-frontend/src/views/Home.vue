<template>
    <v-container fluid fill-height class="home">
        <v-layout justify-center align-center column pa-5>
            <div class="display-4 font-weight-black white--text text-xs-center">INSTANT PIZZA</div>
            <div class="display-4 font-weight-black white--text text-xs-center mb-3">AT YOUR DOOR</div>
            <div class="display-1 font-weight-bold white--text text-xs-center">We guarantee world-class pizza and fastest deliveries in town!</div>
        </v-layout>
    </v-container>
</template>

<script>
export default {
    name: 'home'
};
</script>

<style scoped>
.home {
    background: url('../assets/background-home.jpeg');
    background-size: cover;
    width: 100%;
    height: 100%;
}
</style>