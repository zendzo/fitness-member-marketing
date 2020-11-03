<template>
  <div class="form-group">
    <label v-if="label" :for="id">{{ label }}:</label>
    <input
      :id="id"
      ref="input"
      v-bind="$attrs"
      class="form-control"
      :class="{ 'is-invalid': error }"
      :type="type"
      :value="value"
      @input="$emit('input', $event.target.value)"
      :placeholder="label"
    />
    <div v-if="error" class="invalid-feedback">
      {{ error }}
    </div>
  </div>
</template>

<script>
export default {
  inheritAttrs: false,
  props: {
    id: {
      type: String,
    },
    type: {
      type: String,
      default: "text",
    },
    value: String,
    label: String,
    placeholder: String,
    error: String,
  },
  methods: {
    focus() {
      this.$refs.input.focus();
    },
    select() {
      this.$refs.input.select();
    },
    setSelectionRange(start, end) {
      this.$refs.input.setSelectionRange(start, end);
    },
  },
};
</script>