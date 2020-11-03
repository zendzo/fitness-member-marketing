<template>
  <layout>
    <div class="container">
      <div class="row mb-4">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">Lead Detail</div>
            <div class="card-body">
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
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card" v-if="lead.remainders.length > 0">
            <div class="card-header">Remainder</div>
            <div class="card-body">
              <ul class="list-group list-group-flush">
                <li
                  class="list-group-item list-group-item-action"
                  v-for="remainder in lead.remainders"
                  :key="remainder.id"
                >
                  <div class="row">
                    <div class="col-md-6">{{ remainder.remainder }}</div>
                    <div class="col-md-2">{{ remainder.remainder_date }}</div>
                    <div class="col-md-2"><strong>{{ remainder.status }}</strong></div>
                    <div class="col-md-2">
                      <inertia-link :href="$route('lead.edit', { lead: lead.id })" class="float-right">
                        <svg
                          width="1em"
                          height="1em"
                          viewBox="0 0 16 16"
                          class="bi bi-pencil-square"
                          fill="currentColor"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"
                          />
                          <path
                            fill-rule="evenodd"
                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"
                          />
                        </svg>
                      </inertia-link>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>

          <div class="card" v-else>
            <div class="card-header">Remainder</div>
            <div class="card-body">
              <button class="btn btn-success btn-small">
                Add New Remainders
              </button>
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

export default {
  components: {
    Layout,
    TextInput,
  },
  props: {
    lead_prop: Object,
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

  mounted() {
    this.lead = this.lead_prop;
  },

  methods: {
    async handleSubmit() {
      let response = await this.$inertia.patch(
        `/lead/update/${this.lead.id}`,
        this.lead
      );
    },
  },
};
</script>