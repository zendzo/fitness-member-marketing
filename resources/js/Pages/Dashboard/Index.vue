<template>
  <h4>Dashboard, Welcome {{fname}} {{lname}}</h4>
</template>

<script>
export default {
    props: ['fname','lname'],

    mounted () {
        console.log('This is mounted');
    }
}
</script>

<style>

</style>