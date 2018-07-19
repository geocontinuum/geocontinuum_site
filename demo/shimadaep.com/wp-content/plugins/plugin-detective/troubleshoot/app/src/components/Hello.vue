<template>
  <div class="hello">
    <transition appear name="fade">
      <loading text="Checking records..." v-if="loading"></loading>
      <div v-else>
        <bubble key="bubble">
          <p v-if="activeCase && activeCase.status === 'open'">Looks like you already have an open case. Did you want to continue with that case? Or open a new one?</p>
          <p v-else>Sorry you're having trouble with your site, but don't worry. Detective Otto Bot is on the case! Just click the button to open a new case and get started.</p>
        </bubble>
        <div key="otto">
          <img :src="updatedApi.static_url + '/robot-full.svg'" alt="Otto the Robot">
        </div>
        <md-button v-if="activeCase && activeCase.status === 'open'" class="md-raised md-primary" @click="continueCase" key="continueButton">Continue case</md-button>
        <md-button class="md-raised md-primary" key="newButton" @click="startNew">Open a new case</md-button>
      </div>
    </transition>
  </div>
</template>

<script>
import store from '@/store'
import { mapState, mapActions, mapMutations, mapGetters } from 'vuex'
import Bubble from './Bubble'
import Loading from './Loading'

export default {
  name: 'hello',
  components: { Bubble, Loading },
  store,
  data () {
    return {
      loading: true
    }
  },
  mounted () {
    this.loading = true
    this.getActiveCase()
      .then(() => {
        this.loading = false
        this.checkUrl()
      })
  },
  computed: {
    ...mapState([
      'api',
      'activeCase',
      'router',
      'requestProtocol'
    ]),
    ...mapGetters([
      'updatedApi'
    ])
  },
  methods: {
    checkUrl () {
      let params = new URLSearchParams(window.location.search)
      let setUrl = params.get('url')
      if (setUrl) {
        let url = document.createElement('a')
        url.setAttribute('href', setUrl)
        if (url.protocol !== this.requestProtocol) {
          setUrl.replace(url.protocol, this.requestProtocol)
        }
      }
      this.defineCaseUrl(setUrl || this.updatedApi.site_url)
    },
    startNew () {
      this.loading = true
      if (this.activeCase && this.activeCase.status === 'open') {
        this.closeCase()
          .then(() => {
            this.openCase()
              .then(() => {
                this.router.push('/find-the-problem')
              })
          })
      } else {
        this.loading = true
        this.openCase()
          .then(() => {
            this.checkUrl()
            this.updateCase()
              .then(() => {
                this.router.push('/find-the-problem')
              })
          })
      }
    },
    continueCase () {
      if (this.activeCase.clues.length) {
        this.router.push('/interrogating')
      } else {
        this.router.push('/find-the-problem')
      }
    },
    ...mapActions([
      'getActiveCase',
      'openCase',
      'closeCase',
      'updateCase'
    ]),
    ...mapMutations([
      'defineCaseUrl'
    ])
  }
}
</script>
