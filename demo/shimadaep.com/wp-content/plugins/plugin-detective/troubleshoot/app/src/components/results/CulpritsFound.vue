<!-- One or more culprits found -->
<template>
  <div class="finished culprits-found">
    <loading v-if="loading" text="Deactivating"></loading>
    <template v-else>
      <h2 class="md-display-3">{{culpritTitle}}</h2>
      <div class="results">
        <div class="result" v-for="culprit in activeCase.culprits">
          <div class="culprit-image">
            <img :src="updatedApi.static_url + '/mugshot.svg'" alt="mug shot" class="bg">
            <div class="plugin" v-if="iconMissing">
              <span class="avatar-wrap">
                <span class="avatar">
                  {{activeCase.all_suspects[culprit].Title.charAt(0)}}
                </span>
              </span>
            </div>
            <img v-else :src="activeCase.all_suspects[culprit].icon" :alt="activeCase.all_suspects[culprit].Title" class="plugin" @error="replaceImage(culprit)">
            <div class="sign-text">
              <div class="top">
                <div class="l"><span class="text">WPPD-{{arrestNo()}}</span></div>
                <div class="r"><span class="text">WP Jail</span></div>
              </div>
              <div class="middle" :class="middleClass(activeCase.all_suspects[culprit].Title)">
                <div class="multiline-text">{{activeCase.all_suspects[culprit].Title}}</div>
              </div>
              <div class="bottom">
                <div class="l"><span class="text">Det. Otto Bot</span></div>
                <div class="r"><span class="text">{{today}}</span></div>
              </div>
            </div>
          </div>
          <div class="culprit-info">
            <p>How would you like to deal with this culprit? You can deactivate {{activeCase.all_suspects[culprit].Title}}. Or you can leave it activated and sort out the problem on your own.</p>
            <md-button class="md-primary md-raised" @click="deactivateCulprit(culprit)" :disabled="activeCase.all_suspects[culprit].deactivated">Deactivate it for me</md-button>
            <md-button class="md-primary md-raised" :href="updatedApi.site_url + '/wp-admin'">Return to WordPress dashboard</md-button>
          </div>
        </div>
      </div>
      <div class="corner-otto">
        <bubble>
          <p>Aha! {{culpritString}}.</p>
        </bubble>
        <img :src="updatedApi.static_url + '/robot-corner.svg'" alt="Otto the Robot">
      </div>
    </template>
  </div>
</template>

<script>
import Bubble from '../Bubble'
import Loading from '../Loading'
import { mapState, mapMutations, mapActions, mapGetters } from 'vuex'

export default {
  name: 'culprits-found',
  components: { Bubble, Loading },
  data () {
    return {
      iconMissing: false,
      loading: false
    }
  },
  computed: {
    culpritTitle () {
      return this.activeCase.culprits.length > 1 ? 'Culprits Found' : 'Culprit Found'
    },
    culpritString () {
      let start = this.activeCase.culprits.length > 1 ? 'The culprits are ' : 'The culprit is '

      if (this.activeCase.culprits.length > 1) {
        let list = this.activeCase.culprits.slice(0)
        if (list && list.length > 1) {
          console.log(typeof list)
          let last = this.activeCase.all_suspects[list.pop()].Title
          list = list.map((el) => {
            return this.activeCase.all_suspects[el].Title
          })

          return start + list.join(', ') + ', and ' + last + '.'
        }
      } else {
        if (this.activeCase.all_suspects[this.activeCase.culprits[0]]) {
          return start + this.activeCase.all_suspects[this.activeCase.culprits[0]].Title
        }
      }

      return ''
    },
    today () {
      var today = new Date()
      var m = today.getMonth() + 1
      var d = today.getDate()
      var y = today.getFullYear().toString().substr(-2)

      return m + '/' + d + '/' + y
    },
    ...mapState([
      'api',
      'activeCase'
    ]),
    ...mapGetters([
      'updatedApi'
    ])
  },
  methods: {
    arrestNo () {
      return Math.floor(1000 + Math.random() * 9000)
    },
    middleClass (text) {
      var textClass = ''
      if (text.length > 10) {
        textClass = 'medium-text'
      }
      if (text.length > 20) {
        textClass = 'small-text'
      }
      return textClass
    },
    deactivateCulprit (culprit) {
      this.loading = true
      this.deactivatePlugins([culprit])
        .then(() => {
          this.loading = false
          this.deactivatePlugin(culprit)
        })
    },
    replaceImage (plugin) {
      this.removeImage(plugin)
      this.iconMissing = true
    },
    ...mapMutations([
      'defineCulprits',
      'removeImage',
      'deactivatePlugin'
    ]),
    ...mapActions([
      'deactivatePlugins'
    ])
  }
}
</script>