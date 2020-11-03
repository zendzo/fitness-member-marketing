<template>
  <div>
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

    <div v-if="remainder.id">
      <button class="btn btn-small btn-success" @click="handleAddNewRemainder">
        Add new remainder
      </button>
      <button
        class="btn btn-small btn-outline-danger"
        @click="handleCloseRemainder"
      >
        Close remainder
      </button>
    </div>
    <div v-else>
      <button class="btn btn-small btn-primary" @click="handleSubmit">
        Save remainder
      </button>
    </div>
  </div>
</template>

<script>
import TextInput from "../../Shared/TextInput";
import TextareaInput from "../../Shared/TextareaInput";

export default {
  components: {
    TextInput,
    TextareaInput,
  },
  props: {
    mainRemainder: Object,
    fieldErrors: {
      type: Object,
    },
  },
  data() {
    return {
      remainder: {
        remainder: "",
        remainder_date: "",
      },
      errors: {},
    };
  },
  created() {
    this.remainder = this.mainRemainder;
    this.errors = this.fieldErrors;
  },
  methods: {
    handleSubmit() {
      this.$emit("remainderSubmit", this.remainder);
    },
    handleAddNewRemainder() {
      this.$emit("addNewRemainder", this.remainder);
    },
    handleCloseRemainder() {
      this.$emit("closeRemainder", this.remainder);
    },
  },
};
</script>

<style>
</style>