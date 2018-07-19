<!-- Bad clues - start again? -->
<template>
  <div class="no-culprit finished">
    <md-empty-state
      md-icon="help_outline"
      md-label="Case Unsolved">
      <p>I wasn't able to find the culprit causing this issue because the clues contradicted one another. Please try starting over. When interrogating suspects, please be careful about answering whether the problem is fixed or still broken.</p>
      <md-button class="md-primary" to="/">Start Over</md-button>
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
  name: 'no-culprits-found',
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