<template>
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
</template>

<script>
import TextInput from '../../Shared/TextInput'
import TextareaInput from '../../Shared/TextareaInput'

export default {
  components: {
    TextInput,TextareaInput
  },
  props: {
    mainRemainder: Object,
    fieldErrors: {
      type: Object
    }
  },
  data () {
    return {
      remainder: {
        remainder: '',
        remainder_date: ''
      },
      errors: {}
    }
  },
  created () {
    this.remainder = this.mainRemainder
    this.errors = this.fieldErrors
  },
  methods:{
    handleSubmit(){
      this.$emit('remainderSubmit', this.remainder);
    }
  }
};
</script>

<style>
</style>