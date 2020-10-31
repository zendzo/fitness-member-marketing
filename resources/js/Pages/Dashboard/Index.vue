<template>
  <layout>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h4>Dashboard, Welcome {{fname}} {{lname}}</h4>
        </div>
      </div>
    </div>
  </layout>
</template>

<script>
import Layout from '../../Shared/Layout'

export default {
  components: {
    Layout
  },
  props: ['fname','lname'],

    mounted () {
        console.log('This is mounted');
    }
}
</script>