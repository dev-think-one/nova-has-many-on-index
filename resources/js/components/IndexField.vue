<template>
    <div class="tooltip-html">
        <div class="tooltip-html__val">
            <span>{{ field.value.val }}</span>
            <a
                v-if="field.value.val > 0"
                class="no-underline font-bold dim text-primary"
                @click="toggleShow">
                <template v-if="!isShowContent">
                    {{__('Show more')}}
                </template>
                <template v-else>
                    {{__('Show less')}}
                </template>
            </a>
        </div>
        <transition>
            <div v-show="isShowContent" class="tooltip-html__content">
                <div v-for="item in field.value.items" class="truncate">
                    <component
                        v-if="item.iconComponents"
                        :is="item.iconComponents.name"
                        v-bind="item.iconComponents.attributes"
                    />
                    <router-link
                        :to="{
                          name: 'detail',
                          params: {
                            resourceName: field.value.resourceName,
                            resourceId: item.id,
                          },
                }"
                        class="no-underline font-bold dim text-primary"
                    >
                        {{ item.title }}
                    </router-link>
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
