<template>
  <layout>
    <div class="container">

      <div class="row">
        <div class="col-md-6">
          <h4>
            <inertia-link :href="$route('lead.index')">Lead</inertia-link>
            <span class="breadcrumb-sep">/</span>
            <inertia-link :href="$route('lead.edit', {lead: lead})">Lead Details</inertia-link>
            <span class="breadcrumb-sep">/</span>
            <span class="breadcrumb-sep">Add Reminder</span>
          </h4>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">Add Remainder</div>
            <div class="card-body">
              <remainder-form :field-errors="errors" :main-remainder="remainder" @remainderSubmit="handleSubmit"></remainder-form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </layout>
</template>

<script>
import Layout from "../../Shared/Layout";
import RemainderForm from './RemainderForm';

export default {
  components: {
    Layout,
    RemainderForm
  },
  props: {
    lead: Object,
    errors: Object, 
  },
  data () {
    return {
      remainder: {
        remainder: '',
        remainder_date: '',
        lead_id: this.lead.id
      }
    }
  },
  methods: {
    async handleSubmit(postData){
      await this.$inertia.post(route('remainder.store'), postData);
    }
  }
};
</script>

<style>
</style>