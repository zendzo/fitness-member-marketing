<template>
  <layout>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h4>
            <inertia-link :href="$route('lead.index')">Lead</inertia-link>
            <span class="breadcrumb-sep">/</span>
            <inertia-link :href="$route('lead.edit', { lead: lead })"
              >Lead Details</inertia-link
            >
            <span class="breadcrumb-sep">/</span>
            <span class="breadcrumb-sep">Edit Reminder</span>
          </h4>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">Add Remainder</div>
            <div class="card-body">
              <remainder-form
                :field-errors="errors"
                :main-remainder="remainder"
                @remainderSubmit="handleSubmit"
                @addNewRemainder="handleAddNewRemainder"
                @closeRemainder="handleCloseRemainder"
              ></remainder-form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </layout>
</template>

<script>
import Layout from "../../Shared/Layout";
import RemainderForm from "./RemainderForm";

export default {
  components: {
    Layout,
    RemainderForm,
  },
  props: {
    lead: Object,
    remainder: Object,
    errors: Object,
  },
  methods: {
    handleSubmit(postData) {
      console.log('remainderSubmit', postData);
    },
    async handleAddNewRemainder(postData){
      // this handle [set current remainder = completed and redirect to add new remainder]
      await this.$inertia.post(route('remainder.update'), postData);
    },
    async handleCloseRemainder(postData){
      // this handle [set current remainder = completed as last and redirect to add note] 
      console.log('closeRemainder', postData);
      await this.$inertia.post(route('remainder.close'), postData);
    }
  },
};
</script>