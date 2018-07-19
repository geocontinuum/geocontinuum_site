<!-- Broken Loop - start again? -->
<template>
  <div class="no-culprit finished">
    <md-empty-state
      md-icon="help_outline"
      md-label="Case Unsolved">
      <p>I wasn't able to find the culprit because the clues contradicted one another. It's possible that:</p>
      <ul>
        <li>There's a conflict between multiple plugins only seen when those plugins are active together.</li>
        <li>The clues were incorrect.</li>
      </ul>
      <md-button to="/" class="md-primary">Start Over</md-button>
    </md-empty-state>
    <div class="corner-otto">
      <bubble>
        <p>Hmm...suspicious. The clues seem to conflict. Want to start a new case?</p>
        <md-button class="md-primary md-raised" to="/">Start Over</md-button>
      </bubble>
      <img :src="updatedApi.static_url + '/robot-corner.svg'" alt="Otto the Robot">
    </div>
  </div>
</template>

<script>
import Bubble from '../Bubble'
import { mapState, mapGetters } from 'vuex'

export default {
  name: 'broken-loop',
  components: { Bubble },
  data () {
    return {}
  },
  computed: {
    ...mapState([
      'activeCase',
      'api'
    ]),
    ...mapGetters([
      'updatedApi'
    ])
  }
}
</script>