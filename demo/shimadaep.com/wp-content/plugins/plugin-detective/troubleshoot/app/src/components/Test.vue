<template>
  <div class="find-problem">
    <screen-field v-model="iframeUrl" @load="siteLoaded"></screen-field>
    <div class="interrogation-status" v-if="!loading">
      <counter-box
        title="Interrogating"
        :loading="loading"
        :count="interrogatingCount"
        :avatars="activeCase.suspects_under_interrogation"
      ></counter-box>
      <counter-box
        title="Remaining"
        :loading="loading"
        :count="remainingCount"
        :avatars="holdingCell"
      ></counter-box>
      <counter-box
        title="Cleared"
        :loading="loading"
        :count="clearedCount"
        :avatars="activeCase.cleared_suspects"
      ></counter-box>
    </div>
    <div class="corner-otto" v-if="!loading">
      <bubble>
        <p>Here's your site again. Is the problem fixed?</p>
        <md-button class="md-raised md-accent" @click.native="sendFixedClue">Yes it's fixed</md-button>
        <md-button class="md-raised md-primary" @click.native="sendBrokenClue">No it's still broken</md-button>
      </bubble>
      <img :src="updatedApi.static_url + '/robot-corner.svg'" alt="Otto the Robot">
    </div>
  </div>
</template>

<script>
import store from '@/store'
import Bubble from './Bubble'
import ScreenField from './ScreenField'
import CounterBox from './CounterBox'
import { mapState, mapMutations, mapActions, mapGetters } from 'vuex'

export default {
  name: 'test',
  components: { Bubble, ScreenField, CounterBox },
  store,
  data () {
    return {
      loading: true
    }
  },
  computed: {
    iframeUrl: {
      get () {
        return this.updatedActiveCase.url
      },
      set (value) {
        this.defineCaseUrl(value)
      }
    },
    ...mapState([
      'api',
      'activeCase',
      'router'
    ]),
    ...mapGetters([
      'clearedCount',
      'remainingCount',
      'holdingCell',
      'interrogatingCount',
      'updatedApi',
      'updatedActiveCase'
    ])
  },
  methods: {
    siteLoaded () {
      this.loading = false
    },
    sendFixedClue () {
      this.loading = true
      this.saveClue('fixed')
        .then(() => {
          this.checkCaseStage()
        })
    },
    sendBrokenClue () {
      this.loading = true
      this.saveClue('broken')
        .then(() => {
          this.checkCaseStage()
        })
    },
    checkCaseStage () {
      if (this.activeCase.stage === 'investigating') {
        this.router.push('/interrogating')
      } else {
        this.router.push('/investigation-complete')
      }
    },
    ...mapActions([
      'saveClue'
    ]),
    ...mapMutations([
      'defineCaseUrl'
    ])
  }
}
</script>