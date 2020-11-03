<template>
  <layout>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h4>
            <inertia-link :href="$route('lead.index')">Lead</inertia-link>
            <span class="breadcrumb-sep">/</span>
            <inertia-link :href="$route('lead.edit', { lead: remainder.lead })"
              >Lead Details</inertia-link
            >
            <span class="breadcrumb-sep">/</span>
            <span class="breadcrumb-sep">Add Note</span>
          </h4>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">Add Note</div>
            <div class="card-body">
              <textarea-input
                v-model="postData.note"
                :error="errors.note"
                label="Note"
                id="note"
              />

              <button
                class="btn btn-small btn-success mt-3"
                @click="handleAddNote"
              >
                Add note
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </layout>
</template>

<script>
import Layout from "../../../Shared/Layout";
import TextareaInput from "../../../Shared/TextareaInput";
export default {
  components: {
    Layout,
    TextareaInput,
  },
  props: {
    remainder: Object,
    errors: {
      type: Object,
    },
  },
  data() {
    return {
      postData: {
        note: "",
        remainder_id: this.remainder.id,
      },
    };
  },
  methods: {
    async handleAddNote() {
      await this.$inertia.post(route("remainder.store.note"), this.postData);
    },
  },
};
</script>