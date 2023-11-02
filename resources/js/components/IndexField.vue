<template>
  <div :class="`text-${field.textAlign}`">
      <IconBoolean @click="toggleHandle" :value="value" />
  </div>

</template>

<script>


import { FormField, HandlesValidationErrors } from 'laravel-nova'


export default {
  mixins: [FormField, HandlesValidationErrors],
    data: (instance) => ({
        value: instance.field.value,
    }),
    computed: {
      resourceId() {
          return this.$parent.resource.id.value;
      }
    },
    methods: {
        toggleHandle() {
            let formData = new FormData();
            this.value = !this.value
            let value = this.value ? 1 : 0;
            formData.append(this.field.attribute, value);
            formData.append('_method', 'PUT');

            return Nova.request().post(`/inline-boolean/update/${this.resourceName}`,
                {
                    id: this.resourceId,
                    attribute: this.field.attribute,
                    value: value
                }
            ).then(() => value ? Nova.success('turn on !') : Nova.error('turn off !'))
        },
    },
}
</script>
