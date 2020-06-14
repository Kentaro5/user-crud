<!-- File: src/Template/Articles/add.ctp -->
<?php

?>

<div class="container">
    <div class="columns is-centered">
        <div class="panel column is-5-tablet is-6-desktop is-6-widescreen is-link">
            <p class="panel-heading">
               ユーザー作成画面
            </p>
            <?= $this->Form->create($user) ?>

            <div class="field">
                <?php if ($this->Form->isFieldError('name')) : ?>
                    <div class="notification is-danger">
                        <?php echo $this->Form->error('name') ?>
                    </div>
                <?php endif; ?>
                <label class="label">氏名</label>
                <div class="control">
                    <?= $this->Form->text('name', ['type' => 'text', 'required' => false, 'class' => 'input']) ?>
                </div>
            </div>

            <div class="field">
                <?php if ($this->Form->isFieldError('name')) : ?>
                    <div class="notification is-danger">
                        <?php echo $this->Form->error('name') ?>
                    </div>
                <?php endif; ?>
                <label class="label">性別</label>
                <div class="control">
                    <div class="select">
                        <?= $this->Form->text('name', ['type' => 'text', 'required' => false, 'class' => 'input']) ?>
                    </div>
                </div>
            </div>

            <div class="field">

                <?php if ($this->Form->isFieldError('tell')) : ?>
                    <div class="notification is-danger">
                        <?php echo $this->Form->error('tell') ?>
                    </div>
                <?php endif; ?>
                <label class="label">電話番号</label>
                <div class="control">
                    <?= $this->Form->text('tell', ['type' => 'text', 'required' => false, 'class' => 'input']) ?>
                </div>
            </div>

            <div class="field">

                <?php if ($this->Form->isFieldError('email')) : ?>
                    <div class="notification is-danger">
                        <?php echo $this->Form->error('email') ?>
                    </div>
                <?php endif; ?>
                <label class="label">メールアドレス</label>
                <div class="control">
                    <?= $this->Form->text('email', ['type' => 'text', 'required' => false, 'class' => 'input']) ?>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <?= $this->Form->button(__('登録'), ['class' => 'button is-link']) ?>
                </div>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
