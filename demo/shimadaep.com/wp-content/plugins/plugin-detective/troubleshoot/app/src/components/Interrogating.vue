<template>
  <div class="interrogating">
    <img :src="updatedApi.static_url + '/light.svg'" alt="Interrogation Room Light" class="light">

    <div>
      <counter-box
        v-if="activeCase.suspects_under_interrogation.length"
        title="Interrogating"
        :loading="loading"
        loadingmsg="Checking clues..."
        :count="interrogatingCount"
        :avatars="activeCase.suspects_under_interrogation"
        display="centered"
      ></counter-box>
      <counter-box
        v-else
        title="Interrogating"
        :loading="loading"
        loadingmsg="Checking clues..."
        :count="remainingCount"
        :avatars="holdingCell"
        display="centered"
      ></counter-box>
      <div class="continue">
        <router-link to="/test" tag="md-button" class="md-raised md-accent">
          Start interrogation
          <md-icon>play_arrow</md-icon>
        </router-link>
      </div>
    </div>

    <div class="more-suspects" v-if="activeCase.suspects_under_interrogation.length">
      <counter-box
        title="Holding Cell"
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
  </div>
</template>

<script>
import store from '@/store'
import { mapState, mapActions, mapGetters } from 'vuex'
import Loading from './Loading'
import PluginAvatar from './PluginAvatar'
import CounterBox from './CounterBox'

export default {
  name: 'interrogating',
  store,
  components: { Loading, PluginAvatar, CounterBox },
  data () {
    return {
      loading: true
    }
  },
  beforeMount () {
    this.interrogation()
      .then(() => {
        this.loading = false
      })
  },
  computed: {
    ...mapState([
      'api',
      'activeCase'
    ]),
    ...mapGetters([
      'interrogatingCount',
      'clearedCount',
      'remainingCount',
      'notHolding',
      'holdingCell',
      'updatedApi'
    ])
  },
  methods: {
    ...mapActions([
      'interrogation'
    ])
  }
}
</script>