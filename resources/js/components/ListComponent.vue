<template>
<section class="p-step">
    <a :href="step.id" class="p-step__list" v-for="step in steps.data" :key="step.id">
        <h2 class="p-step__title">{{step.title}}</h2>
        <p class="p-step__info">{{step.created_at}}</p>
        <p class="p-step__info">カテゴリー：{{step.category.name}}</p>
        <p class="p-step__info">目安達成時間：{{step.clear_time}}</p>
        <p class="p-step__info">総合チャレンジ回数：{{step.challenger_count}}人</p>
    </a>
</section>
</template>

<script>
export default {
props: ['steps'],
};
</script>
