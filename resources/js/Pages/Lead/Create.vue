<template>
  <layout>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h4>
            <inertia-link :href="$route('lead.index')">Lead</inertia-link>
            <span class="breadcrumb-sep">/</span>
            <span>Create</span>
          </h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form @submit.prevent="handleSubmit">
            <div class="row">
              <div class="col-md-6">
                <text-input
                  v-model="lead.name"
                  :error="errors.name"
                  label="First name"
                  id="name"
                />
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <text-input
                  v-model="lead.email"
                  :error="errors.email"
                  label="Email address"
                  id="email"
                />
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <text-input
                  v-model="lead.phone"
                  :error="errors.name"
                  label="Phone number"
                  id="phone"
                />
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <text-input
                  v-model="lead.dob"
                  :error="errors.name"
                  label="Date of birth"
                  id="dob"
                  type="date"
                />
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <text-input
                  v-model="lead.interested_package"
                  :error="errors.interested_package"
                  label="Package"
                  id="interested_package"
                />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <button type="submit" class="btn bnt-small btn-primary">
                  Save
                </button>
                <inertia-link
                  :href="$route('lead.index')"
                  class="btn bnt-small btn-warning"
                  >Back</inertia-link
                >
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </layout>
</template>

<script>
import Layout from "../../Shared/Layout";
import TextInput from "../../Shared/TextInput";

export default {
  components: {
    Layout,
    TextInput,
  },
  props: {
    errors: Object,
  },
  data() {
    return {
      lead: {
        name: "",
        email: "",
        phone: "",
        dob: "",
        interested_package: "",
      },
    };
  },

  methods: {
    async handleSubmit() {
      let response = await this.$inertia.post("/lead/store", this.lead);
    },
  },
};
</script>