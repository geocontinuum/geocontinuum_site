import Vue from 'vue'

export default {
  defineApi (state, api) {
    state.api = api
  },
  defineNonce (state, value) {
    Vue.set(state.api, 'nonce', value)
  },
  defineRequestProtocol (state, value) {
    state.requestProtocol = value
  },
  defineUsername (state, value) {
    state.username = value
  },
  definePassword (state, password) {
    state.password = password
  },
  defineCaseUrl (state, value) {
    if (!state.activeCase) {
      return
    }
    Vue.set(state.activeCase, 'url', value)
  },
  defineRequired (state, list) {
    if (!state.activeCase) {
      return
    }
    Vue.set(state.activeCase, 'required_plugins', list)
  },
  defineCase (state, value) {
    state.activeCase = value
  },
  defineUserId (state, value) {
    state.user_id = value
  },
  removeImage (state, pluginKey) {
    Vue.set(state.activeCase.all_suspects[pluginKey], 'icon', null)
  },
  deactivatePlugin (state, pluginKey) {
    Vue.set(state.activeCase.all_suspects[pluginKey], 'deactivated', true)
  }
}
