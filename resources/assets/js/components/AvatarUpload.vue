<template>
  <div>
    <div class="form-group" :class="{ 'has-error': errors[this.sendAs] }">
      <label :for="sendAs" class="control-label">Avatar</label>
      <div v-if="uploading">Uploading...</div>
      <input v-else type="file" v-on:change="fileChange" :name="sendAs">
      <div class="help-block" v-if="errors[this.sendAs]">
        {{ errors[this.sendAs][0] }}
      </div>
    </div>
    <div v-if="avatar.id">
      <input type="hidden" name="avatar_id" :value="avatar.id">
      <img class="avatar" alt="Avatar" :src="avatar.path">
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
          this.upload(e).then(res => {
            this.avatar.path = res.data.data.path
            this.avatar.id = res.data.data.id
          }).catch(err => {
            if (err.response.status === 422) {
              this.errors = err.response.data
              return
            }
            this.errors = 'Error occurred while processing your avatar, please try again'
          })
        }
      }
    }
</script>
