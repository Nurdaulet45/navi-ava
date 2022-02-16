<template>
  <div class="help-block">
    <b
      v-for="(error, index) in errors"
      :key="key(index)"
      class="invalid-feedback"
      style="display: block;"
    > {{ error }}</b>
  </div>
</template>
<script>
export default {
  props: [
    'errors',
  ],
  methods: {
    key(index) {
      return `validation_error_${index}_${Math.random()}`;
    },
  },
};
</script>

<style>
.form-control.is-invalid ~ div > .invalid-feedback {
    display: block;
    /*margin-top: 10px;*/
}

.has-error .help-block, .has-error .control-label, .has-error .radio, .has-error .checkbox, .has-error .radio-inline, .has-error .checkbox-inline, .has-error.radio label, .has-error.checkbox label, .has-error.radio-inline label, .has-error.checkbox-inline label {
    color: #a94442 !important;
}
.is-invalid {
    border-color: #b22222 !important;
    background-image: none;
}
.help-block {
    /*text-align: center;*/
    /*margin: -15px 0px 10px 0px;*/
    font-size: 16px;
    color: #a94442 !important;
    /*color: #b22222;*/
}
</style>
