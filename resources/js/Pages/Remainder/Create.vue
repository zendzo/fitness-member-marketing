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
              <form @submit.prevent="handleSubmit">
                    <textarea-input
                      v-model="remainder.remainder"
                      :error="errors.remainder"
                      label="Remainder"
                      id="remainder"
                    />

                    <text-input
                      v-model="remainder.remainder_date"
                      :error="errors.remainder_date"
                      label="Date"
                      id="remainder_date"
                      type="date"
                    />

                    <button class="btn btn-small btn-primary">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </layout>
</template>

<script>
import Layout from "../../Shared/Layout";
import TextInput from "../../Shared/TextInput";
import TextareaInput from "../../Shared/TextareaInput";

export default {
  components: {
    Layout,
    TextInput,
    TextareaInput
  },
  props: {
    lead: Object,
    errors: Object, 
  },
  data () {
    return {
      remainder: {
        remainder: '',
        remainder_date: ''
      }
    }
  },
  methods: {
    handleSubmit(){
      console.log('this is work');
    }
  }
};
</script>

<style>
</style>