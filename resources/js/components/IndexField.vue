<template>
  <div class="">
    <Badge
      v-if="field.value"
      class="mr-2 mb-3 bg-primary-50 dark:bg-primary-500 text-primary-600 dark:text-gray-900 space-x-1 truncate"
    >
       <span>
          {{ field.value }}
       </span>
      <a
        v-if="field.value > 0"
        class="link-default"
        @click.stop="toggleShow">
        <HeroiconsOutlineEye v-if="!isShowContent" class="w-4"/>
        <HeroiconsOutlineEyeOff v-else  class="w-4"/>
      </a>
    </Badge>
    <transition>
      <div v-show="isShowContent" class="">
        <div v-for="item in field.displayedAs.items"
             class="truncate flex items-center">
          <Icon
            v-if="item.icon"
            :type="item.icon.type"
            :solid="item.icon.solid"
            :class="[item.icon.class, 'mr-1']"
          />
          <a
            :href="item.url"
            @click.stop
            class="link-default"
          >
            {{ item.title }}
          </a>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
export default {
  props: ['resourceName', 'field'],
  data() {
    return {
      isShowContent: false
    }
  },
  methods: {
    toggleShow() {
      this.isShowContent = !this.isShowContent;
    }
  }
}
</script>
