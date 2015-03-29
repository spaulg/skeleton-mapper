<?php

/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license. For more information, see
 * <http://www.doctrine-project.org>.
 */

namespace Doctrine\SkeletonMapper\Persister;

/**
 * Interface that object persisters must implement.
 *
 * @author Jonathan H. Wage <jonwage@gmail.com>
 */
interface ObjectPersisterInterface
{
    /**
     * Returns the class name of the object managed by the repository.
     *
     * @return string
     */
    public function getClassName();

    /**
     * Tells the ObjectManager to make an instance managed and persistent.
     *
     * The object will be entered into the database as a result of the flush operation.
     *
     * NOTE: The persist operation always considers objects that are not yet known to
     * this ObjectManager as NEW. Do not pass detached objects to the persist operation.
     *
     * @param object $object The instance to make managed and persistent.
     */
    public function persist($object);

    /**
     * Schedules the object to be updated.
     *
     * The object will be updated in the database as a result of the flush operation.
     *
     * @param object $object The instance to update
     */
    public function update($object);

    /**
     * Removes an object instance.
     *
     * A removed object will be removed from the database as a result of the flush operation.
     *
     * @param object $object The object instance to remove.
     */
    public function remove($object);

    /**
     * Commits any changes scheduled in the persister.
     */
    public function commit();

    /**
     * Converts an object to an array.
     *
     * @param object $object
     *
     * @return array
     */
    public function objectToArray($object);

    /**
     * Performs operation to write object to the database.
     *
     * @param object $object
     *
     * @return array $objectData
     */
    public function persistObject($object);

    /**
     * Performs operation to update object in the database.
     *
     * @param object $object
     *
     * @return array $objectData
     */
    public function updateObject($object);

    /**
     * Performs operation to remove object in the database.
     *
     * @param object $object
     */
    public function removeObject($object);

    /**
     * @param \Doctrine\SkeletonMapper\Persister $objectAction
     */
    public function executeObjectAction(ObjectAction $objectAction);

    /**
     * Clears any changes scheduled in the persister.
     */
    public function clear();

    /**
     * @param object $object
     *
     * @return bool
     */
    public function isScheduledForPersist($object);

    /**
     * @param object $object
     *
     * @return bool
     */
    public function isScheduledForUpdate($object);

    /**
     * @param object $object
     *
     * @return bool
     */
    public function isScheduledForRemove($object);
}
