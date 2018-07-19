<!-- No culprits found - suggest other options -->
<template>
  <div class="no-culprit finished">
  	<md-empty-state
  		md-icon="help_outline"
  		md-label="No Culprit Found">
			<p>The culprit doesn't seem to be one of the suspected plugins. Here are some other possibilities:</p>
			<ul>
				<li>Your theme or child theme</li>
				<li v-if="activeCase.required_plugins.length">One of the plugins you marked as required</li>
				<li>Any MU plugins installed on the site</li>
			</ul>
      <md-button to="/" class="md-primary">Start Over</md-button>
		</md-empty-state>
  	<div class="corner-otto">
  		<bubble>
  			<p>Well, it's not a plugin. Here are some other ideas for what might be causing the issue.</p>
        <md-button to="/" class="md-primary md-raised">Start Over</md-button>
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