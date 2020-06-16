<section class="user_register">
    <div class="container">
        <div class="columns is-centered">

            <div class="column">

                <div class="buttons">
                    <?= $this->Html->link('新規ユーザー追加',
                        [
                            'controller'=>'Users',
                            'action'=>'add'
                        ],
                        [
                            'class' => 'button is-link'
                        ]
                    )
                    ?>
                </div>

                <table class="table is-fullwidth">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>氏名</th>
                        <th>性別</th>
                        <th>電話番号</th>
                        <th>メールアドレス</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td>
                                <p class="table-text id">
                                    <?php echo h($user->id) ?>
                                </p>
                            </td>
                            <td>
                                <p class="table-text">
                                    <?php echo h($user->first_name . ' ' . $user->last_name) ?>
                                </p>
                            </td>
                            <td>
                                <p class="table-text sex">
                                    <?php echo h($user->sex->name) ?>
                                </p>
                            </td>
                            <td>
                                <p class="table-text">
                                    <?php echo h($user->tell) ?>
                                </p>
                            </td>

                            <td>
                                <p class="table-text email">
                                    <?php echo h($user->email) ?>
                                </p>
                            </td>
                            <td>
                                <p class="table-text">
                                    <?= $this->Html->link('編集',
                                        [
                                            'controller'=>'Users',
                                            'action'=>'edit',
                                            $user->id,
                                        ],
                                        [
                                            'class' => 'button is-success mr-5'
                                        ]
                                    )
                                    ?>

                                    <?= $this->Html->link('削除',
                                        [
                                            'controller'=>'Users',
                                            'action'=>'delete',
                                            $user->id,
                                        ],
                                        [
                                            'class' => 'button is-danger'
                                        ]
                                    )
                                    ?>
                                </p>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>


        </div>
        <div class="columns">

            <div class="column is-12">
                <nav class="pagination" role="navigation" aria-label="pagination">


                    <ul class="pagination-list">

                        <?php if ($this->Paginator->hasPrev()) : ?>
                            <?php echo $this->Paginator->prev() ?>
                        <?php endif; ?>

                        <?php echo $this->Paginator->numbers(); ?>

                        <?php if ($this->Paginator->hasNext()) : ?>
                            <?php echo $this->Paginator->Next() ?>
                        <?php endif; ?>

                    </ul>
                </nav>
            </div>

        </div>
    </div>
</section>
