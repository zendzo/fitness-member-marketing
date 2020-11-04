<template>
  <layout>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h4>Dashboard, Welcome {{ fname }} {{ lname }}</h4>
        </div>
      </div>

      <div class="row" v-if="remainders.length > 0">
        <div class="col-md-12">
          <remainder-list :remainders="remainders"></remainder-list>
        </div>
      </div>
    </div>
  </layout>
</template>

<script>
import Layout from "../../Shared/Layout"
import RemainderList from '../Remainder/RemainderList'

export default {
  components: {
    Layout,
    RemainderList
  },
  props: ["fname", "lname", "remainders"],
};
</script>