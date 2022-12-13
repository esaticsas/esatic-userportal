<?php

namespace Esatic\ActiveUser\Helper;

class UserModuleHelper implements \JsonSerializable
{

    private int $modulesId;
    private string $moduleName;
    private bool $view;
    private bool $create;
    private bool $update;

    /**
     * @return int
     */
    public function getModulesId(): int
    {
        return $this->modulesId;
    }

    /**
     * @param int $modulesId
     */
    public function setModulesId(int $modulesId): void
    {
        $this->modulesId = $modulesId;
    }

    /**
     * @return string
     */
    public function getModuleName(): string
    {
        return $this->moduleName;
    }

    /**
     * @param string $moduleName
     */
    public function setModuleName(string $moduleName): void
    {
        $this->moduleName = $moduleName;
    }

    /**
     * @return bool
     */
    public function isView(): bool
    {
        return $this->view;
    }

    /**
     * @param bool $view
     */
    public function setView(bool $view): void
    {
        $this->view = $view;
    }

    /**
     * @return bool
     */
    public function isCreate(): bool
    {
        return $this->create;
    }

    /**
     * @param bool $create
     */
    public function setCreate(bool $create): void
    {
        $this->create = $create;
    }

    /**
     * @return bool
     */
    public function isUpdate(): bool
    {
        return $this->update;
    }

    /**
     * @param bool $update
     */
    public function setUpdate(bool $update): void
    {
        $this->update = $update;
    }


    public function jsonSerialize(): array
    {
        return array(
            'modules_id' => $this->modulesId,
            'module_name' => $this->moduleName,
            'view' => $this->view,
            'create' => $this->create,
            'update' => $this->update,
        );
    }
}
