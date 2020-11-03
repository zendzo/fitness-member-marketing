<template>
  <div>
    <label v-if="label" :for="id">{{ label }}:</label>
    <textarea
      :id="id"
      ref="input"
      v-bind="$attrs"
      class="form-control"
      :class="{ error: error }"
      :value="value"
      @input="$emit('input', $event.target.value)"
      :placeholder="label"
    />
    <div v-if="error" class="form-error">{{ error }}</div>
  </div>
</template>

<script>
export default {
  inheritAttrs: false,
  props: {
    id: {
      type: String,
    },
    value: String,
    label: String,
    error: String,
    placeholder: String,
  },
  methods: {
    focus() {
      this.$refs.input.focus();
    },
    select() {
      this.$refs.input.select();
    },
  },
};
</script>