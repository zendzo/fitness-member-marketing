<template>
  <layout>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form @submit.prevent="handleSubmit">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Enter Name"
                    v-model="lead.name"
                    id="name"
                  />
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Enter Email"
                    v-model="lead.email"
                    id="email"
                  />
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Enter Phone"
                    v-model="lead.phone"
                    id="phone"
                  />
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="dob">Birth Day</label>
                  <input
                    type="date"
                    class="form-control"
                    placeholder="Birth Day"
                    v-model="lead.dob"
                    id="dob"
                  />
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="package">Interested Package</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Enter Package"
                    v-model="lead.interested_package"
                    id="package"
                  />
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-md-6">
                <button type="submit" class="btn bnt-small btn-primary">Save</button>
                <inertia-link :href="$route('lead.index')" class="btn bnt-small btn-warning">Back</inertia-link>
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

export default {
  components: {
    Layout,
  },
  props: {
    lead_prop: Object
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

  mounted () {
    this.lead = this.lead_prop;
  },

  methods: {
    async handleSubmit() {
    },
  },
};
</script>