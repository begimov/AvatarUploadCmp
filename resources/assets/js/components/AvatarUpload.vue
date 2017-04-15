<template>
  <div>
    <div class="form-group">
      <label for="avatar">Avatar</label>
      <input type="file" v-on:change="fileChange">
      <div class="help-block">
        Help
      </div>
    </div>
    <div>
      <input type="hidden" name="avatar_id">
      <img class="avatar" alt="Avatar">
    </div>
  </div>
</template>

<script>
    import uploadMixin from '../mixins/upload'
    export default {
      props: [
        'currentAvatar'
      ],
      data () {
        return {
          errors: [],
          avatar: {
            id: null,
            path: this.currentAvatar
          }
        }
      },
      mixins: [
        uploadMixin
      ],
      methods: {
        fileChange (e) {
          this.upload(e)
        }
      }
    }
</script>
